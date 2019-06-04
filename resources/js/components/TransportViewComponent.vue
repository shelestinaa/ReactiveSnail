<template>
    <div class="container">
        <div class="alert alert-danger" v-if="error">
            {{ `${error.code}: ${error.message}` }}
        </div>

        <div class="row justify-content-center" v-if="!error && transport">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Транспортное средство</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <td>{{ transport.id }}</td>
                            </tr>
                            <tr>
                                <th>Марка</th>
                                <td>{{ transport.brand }}</td>
                            </tr>
                            <tr>
                                <th>Тип</th>
                                <td>{{ transport.type }}</td>
                            </tr>
                            <tr>
                                <th>Статус</th>
                                <td>{{ transport.status }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Водитель</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <td>{{ transport.driver.id }}</td>
                            </tr>
                            <tr>
                                <th>Имя</th>
                                <td>{{ transport.driver.name }}</td>
                            </tr>
                            <tr>
                                <th>Дата рождения</th>
                                <td>{{ transport.driver.birth_date }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <router-link class="btn btn-primary" style="float: right" :to="{name: 'transport'}">< Назад</router-link>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        props: ['id'],

        data: () => {
            return {
                transport: null,
                error: null
            }
        },

        created() {
            axios.get(`/api/transport/${this.id}`).then(response => {
                this.transport = response.data.response;
                this.error = null;
            }).catch(error => {
                this.error = error.data.error;
            })
        }
    }
</script>

<style scoped>

</style>