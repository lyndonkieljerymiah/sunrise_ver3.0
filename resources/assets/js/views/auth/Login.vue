<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" @submit.prevent="login">
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">User Name:</label>
                                <div class="col-md-6">
                                    <input id="user_name" type="text" class="form-control" v-model="user.user_name" name="user_name" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password:</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="user.password" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

import { mapState } from "vuex";

export default {
    name: "login",
    computed: {
        ...mapState("auth", { 
            user: state => state.user
        }),
    }, 
    methods: {
        login() {
            this.$store.dispatch("auth/login");
        }
    }
}
</script>