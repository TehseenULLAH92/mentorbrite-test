<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">List All Places</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="place, index in places">
                        <td>{{ place.name }}</td>
                        <td>{{ place.street }}</td>
                        <td>{{ place.city }}</td>
                        <td>{{ place.latitude }}</td>
                        <td>{{ place.longitude }}</td>
                        <td>
                            <router-link :to="{name: 'editPlace', params: {id: place.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(place.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
