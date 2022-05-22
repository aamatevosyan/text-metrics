<template>
    <app-layout title="Courseworks">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <data-table :value="courseWorks" :paginator="true" class="p-datatable-courseworks" :rows="10"
                                dataKey="uuid" :rowHover="true"
                                v-model:filters="filters" filterDisplay="menu"
                                paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                                :rowsPerPageOptions="[10,25,50]"
                                currentPageReportTemplate="Showing {first} to {last} of {totalRecords} entries"
                                :globalFilterFields="['name','supervisor']"
                                responsiveLayout="scroll">
                        <template #header>
                            <div class="flex justify-content-center align-items-center">
                                <span class="p-input-icon-left">
                        <i class="pi pi-search"/>
                        <prime-input-text v-model="filters['global'].value" placeholder="Keyword Search"/>
                            </span>
                            </div>
                        </template>
                        <template #empty>
                            No customers found.
                        </template>
                        <template #loading>
                            Loading customers data. Please wait.
                        </template>
                        <column field="name" header="Name" sortable style="min-width: 14rem">
                            <template #body="{data}">
                                <a :href="route('front.course-works.show', {course_work: data.uuid})"
                                   v-text="data.name"/>
                            </template>
                            <template #filter="{filterModel}">
                                <prime-input-text type="text" v-model="filterModel.value" class="p-column-filter"
                                                  placeholder="Search by name"/>
                            </template>
                        </column>
                        <column field="supervisor" header="Supervisor" sortable filterMatchMode="contains"
                                style="min-width: 14rem">
                            <template #body="{data}">
                                <span class="image-text">{{ data.supervisor }}</span>
                            </template>
                            <template #filter="{filterModel}">
                                <prime-input-text type="text" v-model="filterModel.value" class="p-column-filter"
                                                  placeholder="Search by supervisor"/>
                            </template>
                        </column>
                        <column field="created_at" header="Date" sortable dataType="date" style="min-width: 8rem">
                            <template #body="{data}">
                                {{ formatDate(data.created_at) }}
                            </template>
                            <template #filter="{filterModel}">
                                <prime-calendar v-model="filterModel.value" dateFormat="mm/dd/yy"
                                                placeholder="mm/dd/yyyy"/>
                            </template>
                        </column>
                        <column field="status" header="Status" sortable :filterMenuStyle="{'width':'14rem'}"
                                style="min-width: 10rem">
                            <template #body="{data}">
                                <prime-tag :class="'customer-badge status-' + data.status"
                                           :severity="data.status ? 'sucess' : 'danger'">{{
                                        statuses[data.status]
                                    }}
                                </prime-tag>
                            </template>
                            <template #filter="{filterModel}">
                                <prime-dropdown v-model="filterModel.value" :options="[...statuses.keys()]"
                                                placeholder="Any"
                                                class="p-column-filter" :showClear="true">
                                    <template #value="slotProps">
                                        <span
                                            :class="'customer-badge status-' + slotProps.value">{{
                                                statuses[slotProps.value]
                                            }}</span>
                                    </template>
                                    <template #option="slotProps">
                                        <span
                                            :class="'customer-badge status-' + slotProps.option">{{
                                                statuses[slotProps.option]
                                            }}</span>
                                    </template>
                                </prime-dropdown>
                            </template>
                        </column>
                        <column field="type" header="Type" sortable :filterMenuStyle="{'width':'14rem'}"
                                style="min-width: 10rem">
                            <template #body="{data}">
                                <badge :class="'customer-badge type-' + data.type">{{ types[data.type] }}</badge>
                            </template>
                            <template #filter="{filterModel}">
                                <prime-dropdown v-model="filterModel.value" :options="[...types.keys()]"
                                                placeholder="Any"
                                                class="p-column-filter" :showClear="true">
                                    <template #value="slotProps">
                                        <span
                                            :class="'customer-badge status-' + slotProps.value">{{
                                                types[slotProps.value]
                                            }}</span>
                                    </template>
                                    <template #option="slotProps">
                                        <span
                                            :class="'customer-badge status-' + slotProps.option">{{
                                                types[slotProps.option]
                                            }}</span>
                                    </template>
                                </prime-dropdown>
                            </template>
                        </column>
                        <column field="plagiat_percentage" header="Plagiat" sortable :showFilterMatchModes="false"
                                style="min-width: 10rem">
                            <template #body="{data}">
                                <prime-progress-bar :value="data.plagiat_percentage" :showValue="false"/>
                            </template>
                            <template #filter="{filterModel}">
                                <prime-slider v-model="filterModel.value" range class="m-3"></prime-slider>
                                <div class="flex align-items-center justify-content-center px-2">
                                    <span>{{ filterModel.value ? filterModel.value[0] : 0 }}</span>
                                    <span>{{ filterModel.value ? filterModel.value[1] : 100 }}</span>
                                </div>
                            </template>
                        </column>
                        <column headerStyle="width: 4rem; text-align: center"
                                bodyStyle="text-align: center; overflow: visible">
                            <template #body="{data}">
                                <prime-button type="button" icon="pi pi-eye"
                                              @click.stop="preview(route('front.course-works.show', {course_work:
                                              data.uuid}))"></prime-button>
                            </template>
                        </column>
                    </data-table>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent, computed, ref} from 'vue'
import AppLayout from '@front/Layouts/AppLayout.vue'
import {FilterMatchMode, FilterOperator} from "primevue/api";

export default defineComponent({
    components: {
        AppLayout,
    },
    setup(props, {attrs}) {
        const courseWorks = computed(() => attrs.data);
        const selectedCourseWork = ref(null)

        const filters = ref({
            global: {value: null, matchMode: FilterMatchMode.CONTAINS},
            name: {
                operator: FilterOperator.AND,
                constraints: [{value: null, matchMode: FilterMatchMode.CONTAINS}],
            },
            supervisor: {
                operator: FilterOperator.AND,
                constraints: [{value: null, matchMode: FilterMatchMode.CONTAINS}],
            },
            created_at: {
                operator: FilterOperator.AND,
                constraints: [{value: null, matchMode: FilterMatchMode.DATE_IS}],
            },
            status: {
                operator: FilterOperator.OR,
                constraints: [{value: null, matchMode: FilterMatchMode.EQUALS}],
            },
            type: {
                operator: FilterOperator.OR,
                constraints: [{value: null, matchMode: FilterMatchMode.EQUALS}],
            },
            plagiat_percentage: {value: null, matchMode: FilterMatchMode.BETWEEN},
        });

        const statuses = ref([
            'Inactive',
            'Active'
        ]);

        const types = ref([
            'Course Work',
            'Diploma',
        ]);

        const formatDate = (value) => {
            return (new Date(value)).toLocaleDateString("en-US", {
                day: "2-digit",
                month: "2-digit",
                year: "numeric",
            });
        };

        const preview = (url) => {
            window.open(url, '_blank');
        }

        return {
            courseWorks,
            selectedCourseWork,
            filters,
            types,
            statuses,
            formatDate,
            preview,
        }
    }
})
</script>

<style lang="scss" scoped>
img {
    vertical-align: middle;
}

::v-deep(.p-paginator) {
    .p-paginator-current {
        margin-left: auto;
    }
}

::v-deep(.p-progressbar) {
    height: .5rem;
    background-color: #D8DADC;

    .p-progressbar-value {
        background-color: #607D8B;
    }
}

::v-deep(.p-datepicker) {
    min-width: 25rem;

    td {
        font-weight: 400;
    }
}

::v-deep(.p-datatable.p-datatable-courseworks) {
    .p-datatable-header {
        padding: 1rem;
        text-align: left;
        font-size: 1.5rem;
    }

    .p-paginator {
        padding: 1rem;
    }

    .p-datatable-thead > tr > th {
        text-align: left;
    }

    .p-datatable-tbody > tr > td {
        cursor: auto;
    }

    .p-dropdown-label:not(.p-placeholder) {
        text-transform: uppercase;
    }
}
</style>
