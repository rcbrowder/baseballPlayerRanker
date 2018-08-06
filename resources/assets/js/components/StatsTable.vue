<template>
    <div class="row">
        <div id="buttongroup" class="col col-sm-2 btn-group-vertical btn-group-toggle ml-2">

            <label class="btn btn-secondary" :class="{active: PA == 1}">
                <input type="checkbox" v-model="PA" autocomplete="off" name="PA" value="PA">PA
            </label>

            <label class="btn btn-secondary" :class="{active: LOB == 1}">
                <input type="checkbox" v-model="LOB" autocomplete="off" name="LOB" value="LOB">LOB
            </label>

            <label class="btn btn-secondary" :class="{active: AB == 1}">
                <input type="checkbox" v-model="AB" autocomplete="off" name="AB" value="AB">AB
            </label>
        </div>

        <div id="display" class="col col-sm-9 text-center">

            <table class="table table-sm table-dark table-striped table-responsive table-hover header-fixed">
                <thead>
                    <tr>
                        <th>Player</th>
                        <th>Position</th>
                        <th v-if="AB === true">AB</th>
                        <th v-if="LOB === true">LOB</th>
                        <th v-if="PA === true">PA</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="player in total">
                        <td style="width:10%;">{{player.name}}</td>
                        <td style="width:5%;">{{player.position}}</td>
                        <td v-if="AB === true">{{ player.AB }}</td>
                        <td v-if="LOB === true">{{ player.LOB }}</td>
                        <td v-if="PA === true">{{ player.PA }}</td>
                        <td>{{ player.total }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


    <!-- </div> -->

</template>


<script>
    export default {

        props: ['play'],

        data: () => ({
            toggle: false,
            AB: true,
            LOB: true,
            PA: true,
        }),

        methods: {
            notNull: function(val) {
                if (val == null) {
                    return 0;
                }
                return val;
            },
        },


        computed: {
            total: function() {
                var newPlayers = this.play;
                for (var player in newPlayers) {
                    var tot = (this.AB * this.notNull(newPlayers[player].AB)) + (this.LOB * this.notNull(newPlayers[player].LOB)) + (this.PA * this.notNull(newPlayers[player].PA));
                    newPlayers[player].total = Number.parseFloat(tot).toFixed(2);
                }

                return newPlayers;
            }
        },
    }
</script>

<style>
    #displayDiv {
        overflow: scroll;
        display: block;
        height: 50%;
        width: 70%;
        margin-top: 60px;
        position: relative;
    }

    table {
        width: 70%;
    }

    th,
    td {
        width: 5%;
    }
</style>