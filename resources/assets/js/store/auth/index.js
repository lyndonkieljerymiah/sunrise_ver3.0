

const state = {
    user: {
        user_name: "",
        password: ""
    },
    register: {
        fullName: "",
        userName: "",
        emailAddress: "",
        password: "",
        confirmation:"",
        apiToken: ""
    }
};


const getters = {
    user(state) {
        return state.user;
    },
    register(state) {
        return state.register;
    }
}

const actions = {
    apiRequest({state,commit}) {
        axios.get("/oauth/clients",res => {
            console.log(res.data);
        })
    },
    login({state,commit}) {
        axios.post("/login",state.user)
            .then( r => {
                console.log(r);
            });
    }
}

const auth = {
    namespaced: true,
    state,
    getters,
    actions
};


export default auth;