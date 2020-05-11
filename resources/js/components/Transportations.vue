<template>
    <div>
        <h2>
            Вантажи
        </h2>
        <div class="table-responsive">
            <table class="table trasportation-table">
                <tbody>
                    <tr v-for="load in loads" v-bind:key="load.id">
                        <td class="path w-50">
                            <div @click="showLoadInfo(load)">
                                {{ load.fromCityName }} - {{ load.toCityName }}
                            </div>
                            <div v-show="loadActiveId === load.id" class="display: flex; justify-content:space-around;" style="width: 350px">
                                <div class="inline-block" style="float: left;">
                                    <img class="load-photo" :src="load.photo" /> 
                                </div>
                                <div :ref="'map-' + load.id" class="inline-block map"></div>
                            </div> 
                        </td>
                        <td class="w-50 text-right">{{ load.volume }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import Vue from 'vue'

    export default {
        data() {
            return {
                loads: [],
                loadActiveId: null
            }
        },
        mounted() {
            this.fecthLoads()
        },
        methods: {
            showLoadInfo (load) {
                this.loadActiveId = load.id
                const map = $(this.$refs['map-' + load.id])
                if (!map.html()) {
                    $(this.$refs['map-' + load.id]).jHERE({
                        enable: ['behavior'],
                        center: [50.4, 30.5],
                        zoom: 4
                    })
                        .jHERE('marker', [load.fromCity.lat, load.fromCity.lng], {group: 'cities', fill: 'blue'})
                        .jHERE('marker', [load.toCity.lat, load.toCity.lng], {group: 'cities', fill: 'green'})
                        .jHERE('route', [load.fromCity.lat, load.fromCity.lng], [load.toCity.lat, load.toCity.lng])
                }
            },
            fecthLoads () {
                const params = {
                    lang: this.$route.params.lang,
                    from: this.$route.params.from
                }
                axios.get(location.origin + '/api/loads', {
                    params
                }) 
                    .then((response) => {
                        this.loads = response.data.data
                    }, (error) => {
                        console.log(error)
                    });
            }
        }
    }
</script>