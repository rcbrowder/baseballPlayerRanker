<template>
    <div class="row">
        <div id="buttongroup" class="col col-sm-2 btn-group-vertical btn-group-toggle ml-2">

            <label class="btn btn-secondary" :class="{active: PA == 1}">
                <input type="checkbox" v-model="PA" autocomplete="off" name="PA" value="PA">Plate Appearances
            </label>

            <label class="btn btn-secondary" :class="{active: LOB == 1}">
                <input type="checkbox" v-model="LOB" autocomplete="off" name="LOB" value="LOB">Left on Base
            </label>

            <label class="btn btn-secondary" :class="{active: AB == 1}">
                <input type="checkbox" v-model="AB" autocomplete="off" name="AB" value="AB">At Bats
            </label>

            <label class="btn btn-secondary" :class="{active: R == 1}">
                <input type="checkbox" v-model="R" autocomplete="off" name="R" value="R">Runs
            </label>

            <label class="btn btn-secondary" :class="{active: H == 1}">
                <input type="checkbox" v-model="H" autocomplete="off" name="H" value="H">Hits
            </label>

            <label class="btn btn-secondary" :class="{active: twoB == 1}">
                <input type="checkbox" v-model="twoB" autocomplete="off" name="twoB" value="twoB">Doubles
            </label>

            <label class="btn btn-secondary" :class="{active: threeB == 1}">
                <input type="checkbox" v-model="threeB" autocomplete="off" name="threeB" value="threeB">Triples
            </label>

            <label class="btn btn-secondary" :class="{active: HR == 1}">
                <input type="checkbox" v-model="HR" autocomplete="off" name="HR" value="HR">Home Runs
            </label>

        </div>

        <div id="display" class="col col-sm-9 text-center">

            <table class="table table-sm table-dark table-striped table-responsive table-hover header-fixed">
                <thead>
                    <tr>
                        <th>Player</th>
                        <th>Position</th>
                        <th>Total Z-Score</th>
                        <!-- <th v-for="cat in catArray" v-if="cat === true">{{cat}}</th> -->
                        <th v-if="AB === true">AB</th>
                        <th v-if="LOB === true">LOB</th>
                        <th v-if="PA === true">PA</th>
                        <th v-if="R === true">R</th>
                        <th v-if="H === true">H</th>
                        <th v-if="twoB === true">2B</th>
                        <th v-if="threeB === true">3B</th>
                        <th v-if="HR === true">HR</th>


                    </tr>
                </thead>
                <tbody>
                    <tr v-for="player in total">
                        <td>{{ player.name }}</td>
                        <td>{{ player.position }}</td>
                        <td>{{ player.total }}</td>

                        <td v-if="AB === true">{{ player.AB }}</td>
                        <td v-if="LOB === true">{{ player.LOB }}</td>
                        <td v-if="PA === true">{{ player.PA }}</td>
                        <td v-if="R === true">{{ player.R }}</td>
                        <td v-if="H === true">{{ player.H }}</td>
                        <td v-if="twoB === true">{{ player.twoB }}</td>
                        <td v-if="threeB === true">{{ player.threeB }}</td>
                        <td v-if="HR === true">{{ player.HR }}</td>

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
            R: true,
            H: true,
            twoB: true,
            threeB: true,
            HR: true,
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
                    var tot = (this.AB * this.notNull(newPlayers[player].AB)) +
                        (this.LOB * this.notNull(newPlayers[player].LOB)) +
                        (this.PA * this.notNull(newPlayers[player].PA)) +
                        (this.R * this.notNull(newPlayers[player].R)) +
                        (this.H * this.notNull(newPlayers[player].H)) +
                        (this.twoB * this.notNull(newPlayers[player].twoB)) +
                        (this.threeB * this.notNull(newPlayers[player].threeB)) +
                        (this.HR * this.notNull(newPlayers[player].HR));
                    newPlayers[player].total = Number.parseFloat(tot).toFixed(2);
                }

                var sortable = [];
                for (var key in newPlayers) {
                    if (newPlayers.hasOwnProperty(key)) {
                        sortable.push([key, newPlayers[key]]);
                    }
                }
                sortable.sort(function(a, b) {
                    return b[1].total - a[1].total;
                });

                var rv = {};
                for (var i = 0; i < sortable.length; ++i) {
                    rv[sortable[i]] = sortable[i][1];
                }
                console.log(rv);
                return rv;

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