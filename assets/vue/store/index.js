import { createStore } from 'vuex'

import detail from "./detail";
import popup from "./popup";

export default createStore({
    modules: {
        detail,
        popup
    },
})
