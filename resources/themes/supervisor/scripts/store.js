import {createStore} from "vuex";

const store = createStore({
    state: {
        routes: [
            {
                title: 'Courseworks',
                name: 'supervisor.course-works',
            }
        ],
        config: {}
    },
    getters: {
        routes(state) {
            return state.routes;
        },
    },
});

export default store;
