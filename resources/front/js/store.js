import {createStore} from "vuex";

const store = createStore({
    state: {
        routes: [
            {
                title: 'Courseworks',
                name: 'front.course-works',
            }
        ],
        config: {
            maxFileUploadSizeInMB: 100,
        }
    },
    getters: {
        routes(state) {
            return state.routes;
        },
        maxFileUploadSize(state) {
            return state.config.maxFileUploadSizeInMB * 1024 * 1024;
        }
    },
});

export default store;
