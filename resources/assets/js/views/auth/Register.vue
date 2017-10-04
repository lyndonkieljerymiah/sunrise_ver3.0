<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Full Name:</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" v-model="register.fullName" name="name" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">User Name:</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" v-model="register.userName" name="name" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address:</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="register.emailAddress" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password:</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="register.password" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password:</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" v-model="register.confirmation" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">API Token:</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control" v-model="register.apiToken" name="password_confirmation" required>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" @click.prevent="request()">Request</button>
                                        </span>
                                    </div>

                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
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
import { mapGetters } from "vuex";


export default {
    computed: mapGetters("auth", {
        register: "register"
    }),
    methods: {
        request() {
            this.$store.dispatch("auth/apiRequest");
        }
    }
}
</script>