<template>
    <div>
        <h2>
            Вантажи
        </h2>
        <div class="table-responsive">
            <table class="table trasportation-table">
                <tbody>
                    <tr v-for="(load, k) in loads" v-bind:key="k"> 
                        <td class="path w-50">
                            <div @click="showLoadInfo(load)">
                                {{ load.fromCity }} - {{ load.toCity }}
                            </div>
                            <div v-show="load.showInfo" class="display: flex; justify-content:space-around;" style="width: 350px">
                                <div class="inline-block" style="float: left;">
                                    <img class="load-photo" :src="load.photo" /> 
                                </div>
                                <div v-bind:id="'map-' + load.id" class="inline-block map"></div>
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
            }
        },
        mounted() {
            this.fecthLoads()
        }, 
        methods: {
            showLoadInfo (load) {
                let i
                for (i = 0; i < this.loads.length; i++) {            
                    if (this.loads[i].id === load.id) {
                        Vue.set(this.loads[i], 'showInfo', true)
                        if (!this.loads[i].map) {
                            $('#map-' + this.loads[i].id).jHERE({
                            enable: ['behavior'],
                            center: [50.4, 30.5],
                            zoom: 4
                        })
                        .jHERE('marker', [this.loads[i].from_city.lat, this.loads[i].from_city.lng], {group: 'cities', fill: 'blue'})
                        .jHERE('marker', [this.loads[i].to_city.lat, this.loads[i].to_city.lng], {group: 'cities', fill: 'green'})
                        .jHERE('route', [this.loads[i].from_city.lat, this.loads[i].from_city.lng], [this.loads[i].to_city.lat, this.loads[i].to_city.lng])
                        } 
                        this.loads[i].map = true
                    } else {  
                        Vue.set(this.loads[i], 'showInfo', false)
                    } 
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
                        this.loads = response.data
                    }, (error) => {
                        console.log(error)
                    });
            }
        }
    }
</script>