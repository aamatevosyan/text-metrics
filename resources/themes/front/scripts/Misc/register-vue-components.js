import JetNavLink from '@/Components/Jetstream/NavLink.vue'
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';
import FileUpload from 'primevue/fileupload';
import Message from 'primevue/message'
import ProgressBar from "primevue/progressbar";
import Tree from 'primevue/tree';
import Button from "primevue/button";
import Dialog from 'primevue/dialog';

export default (app) => {
    return app
        .component('jet-nav-link', JetNavLink)
        .component('data-table', DataTable)
        .component('column-group', ColumnGroup)
        .component('column', Column)
        .component('file-upload', FileUpload)
        .component('message', Message)
        .component('progress-bar', ProgressBar)
        .component('tree', Tree)
        .component('prime-button', Button)
        .component('prime-dialog', Dialog)
};
