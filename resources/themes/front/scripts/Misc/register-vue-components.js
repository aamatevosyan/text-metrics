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
import Splitter from 'primevue/splitter';
import SplitterPanel from 'primevue/splitterpanel';
import Divider from "primevue/divider";
import Tag from "primevue/tag";
import Badge from 'primevue/badge';
import BadgeDirective from 'primevue/badgedirective';
import Dropdown from "primevue/dropdown";
import Calendar from "primevue/calendar";
import Slider from "primevue/slider";
import InputText from "primevue/inputtext";

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
        .component('prime-dropdown', Dropdown)
        .component('prime-dialog', Dialog)
        .component('prime-calendar', Calendar)
        .component('prime-progress-bar', ProgressBar)
        .component('prime-slider', Slider)
        .component('prime-input-text', InputText)
        .component('splitter', Splitter)
        .component('splitter-panel', SplitterPanel)
        .component('divider', Divider)
        .component('prime-tag', Tag)
        .component('badge', Badge)
        .directive('badge', BadgeDirective)
};
