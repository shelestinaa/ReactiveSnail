<template>
    <div class="container">
        <div class="alert alert-danger" v-if="error">
            {{ `${error.code}: ${error.message}` }}
        </div>
        <table class="table table-striped" v-if="!error">
            <thead>
            <tr>
                <td>#</td>
                <td>Марка</td>
                <td>Тип</td>
                <td>Статус</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(transport, index) of transports" :key="index">
                <td>{{ transport.id }}</td>
                <td>{{ transport.brand }}</td>
                <td>{{ transport.type }}</td>
                <td>{{ transport.status }}</td>
                <td>
                    <router-link class="btn btn-primary" style="float: right"
                                 :to="{name: 'transport-view', params: {id: transport.id}}">Подробнее..
                    </router-link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data: () => {
            return {
                transports: [],
                error: null
            }
        },

        created() {
            axios.get('/api/transport').then(response => {
                this.transports = response.data.response;
                this.error = null;
            }).catch(error => {
                this.error = error.data.error;
            })
        }
    }
</script>

<style scoped>

</style>