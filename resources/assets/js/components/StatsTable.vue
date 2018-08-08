<template>
    <div id="#wrapper" class="row h-100 w-100">


        <div id="buttongroup" class="col col-sm-2 btn-group-vertical btn-group-toggle">

            <div class="btn-secondary pretty p-switch p-outline" :class="{active: PA == 1}">
                <input type="checkbox" v-model="PA" autocomplete="off" name="PA" value="PA">
                <div class="state p-success">
                    <label>&nbsp;&nbsp;Plate Appearances</label>
                </div>
            </div>

            <div class="btn-secondary pretty p-switch p-outline" :class="{active: LOB == 1}">
                <input type="checkbox" v-model="LOB" autocomplete="off" name="LOB" value="LOB">
                <div class="state p-success">
                    <label>&nbsp;&nbsp;Left on Base</label>
                </div>
            </div>

            <div class="btn-secondary pretty p-switch p-outline" :class="{active: AB == 1}">
                <input type="checkbox" v-model="AB" autocomplete="off" name="AB" value="AB">
                <div class="state p-success">
                    <label>&nbsp;&nbsp;At Bats</label>
                </div>
            </div>

            <div class="btn-secondary pretty p-switch p-outline" :class="{active: R == 1}">
                <input type="checkbox" v-model="R" autocomplete="off" name="R" value="R">
                <div class="state p-success">
                    <label>&nbsp;&nbsp;Runs</label>
                </div>
            </div>

            <div class="btn-secondary pretty p-switch p-outline" :class="{active: H == 1}">
                <input type="checkbox" v-model="H" autocomplete="off" name="H" value="H">
                <div class="state p-success">
                    <label>&nbsp;&nbsp;Hits</label>
                </div>
            </div>

            <div class="btn-secondary pretty p-switch p-outline" :class="{active: twoB == 1}">
                <input type="checkbox" v-model="twoB" autocomplete="off" name="twoB" value="twoB">
                <div class="state p-success">
                    <label>&nbsp;&nbsp;Doubles</label>
                </div>
            </div>

            <div class="btn-secondary pretty p-switch p-outline" :class="{active: threeB == 1}">
                <input type="checkbox" v-model="threeB" autocomplete="off" name="threeB" value="threeB">
                <div class="state p-success">
                    <label>&nbsp;&nbsp;Triples</label>
                </div>
            </div>

            <div class="btn-secondary pretty p-switch p-outline" :class="{active: HR == 1}">
                <input type="checkbox" v-model="HR" autocomplete="off" name="HR" value="HR">
                <div class="state p-success">
                    <label>&nbsp;&nbsp;Home Runs</label>
                </div>
            </div>

            <div class="btn-secondary pretty p-switch p-outline" :class="{active: RBI == 1}">
                <input type="checkbox" v-model="RBI" autocomplete="off" name="RBI" value="RBI">
                <div class="state p-success">
                    <label>&nbsp;&nbsp;Runs Batted In</label>
                </div>
            </div>

            <div class="btn-secondary pretty p-switch p-outline" :class="{active: BB == 1}">
                <input type="checkbox" v-model="BB" autocomplete="off" name="BB" value="BB">
                <div class="state p-success">
                    <label>&nbsp;&nbsp;Walks</label>
                </div>
            </div>

            <div class="btn-secondary pretty p-switch p-outline" :class="{active: SB == 1}">
                <input type="checkbox" v-model="SB" autocomplete="off" name="SB" value="SB">
                <div class="state p-success">
                    <label>&nbsp;&nbsp;Stolen Bases</label>
                </div>
            </div>

            <div class="btn-secondary pretty p-switch p-outline" :class="{active: AVG == 1}">
                <input type="checkbox" v-model="AVG" autocomplete="off" name="AVG" value="AVG">
                <div class="state p-success">
                    <label>&nbsp;&nbsp;Batting Average</label>
                </div>
            </div>

        </div>

        <div id="display" class="col col-md-9">

            <table class="table table-dark table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Player</th>
                        <th>Position</th>
                        <th id="totalTH">Total Z-Score</th>
                        <!-- <th v-for="cat in catArray" v-if="cat === true">{{cat}}</th> -->
                        <th v-if="AB === true">AB</th>
                        <th v-if="LOB === true">LOB</th>
                        <th v-if="PA === true">PA</th>
                        <th v-if="R === true">R</th>
                        <th v-if="H === true">H</th>
                        <th v-if="twoB === true">2B</th>
                        <th v-if="threeB === true">3B</th>
                        <th v-if="HR === true">HR</th>
                        <th v-if="RBI === true">RBI</th>
                        <th v-if="BB === true">BB</th>
                        <th v-if="SB === true">SB</th>
                        <th v-if="AVG === true">AVG</th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="player in total">
                        <td>{{ player.name }}</td>
                        <td>{{ player.position }}</td>
                        <td id="totalTD">{{ player.total }}</td>

                        <td v-if="AB === true" :class="{'text-success': player.AB > 0.5, 'text-danger': player.AB < -0.5}">{{ player.AB }}</td>

                        <td v-if="LOB === true" :class="{'text-success': player.LOB > 0.60, 'text-danger': player.LOB < -0.60}">{{ player.LOB }}</td>

                        <td v-if="PA === true" :class="{'text-success': player.PA > 0.60, 'text-danger': player.PA < -0.60}">{{ player.PA }}</td>

                        <td v-if="R === true":class="{'text-success': player.R > 0.60, 'text-danger': player.R < -0.60}">{{ player.R }}</td>

                        <td v-if="H === true" :class="{'text-success': player.H > 0.60, 'text-danger': player.H < -0.60}">{{ player.H }}</td>

                        <td v-if="twoB === true" :class="{'text-success': player.twoB > 0.60, 'text-danger': player.twoB < -0.60}">{{ player.twoB }}</td>

                        <td v-if="threeB === true" :class="{'text-success': player.threeB > 0.60, 'text-danger': player.threeB < -0.60}">{{ player.threeB }}</td>

                        <td v-if="HR === true" :class="{'text-success': player.HR > 0.6, 'text-danger': player.HR < -0.6}">{{ player.HR }}</td>

                        <td v-if="RBI === true" :class="{'text-success': player.RBI > 0.6, 'text-danger': player.RBI < -0.6}">{{ player.RBI }}</td>

                        <td v-if="BB === true" :class="{'text-success': player.BB > 0.6, 'text-danger': player.BB < -0.6}">{{ player.BB }}</td>

                        <td v-if="SB === true" :class="{'text-success': player.SB > 0.6, 'text-danger': player.SB < -0.6}">{{ player.SB }}</td>

                        <td v-if="AVG === true" :class="{'text-success': player.AVG > 0.6, 'text-danger': player.AVG < -0.6}">{{ player.AVG }}</td>


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
            RBI: true,
            BB: true,
            SB: true,
            AVG: true,
        }),

        methods: {
            notNull: function(val) {
                if (val == null) {
                    return 0;
                }
                return val;
            },

            color: function(val) {
                if (val >= 0.5) {
                    return true;
                } else {
                    return false;
                }
            }
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
                        (this.HR * this.notNull(newPlayers[player].HR)) +
                        (this.RBI * this.notNull(newPlayers[player].RBI)) +
                        (this.BB * this.notNull(newPlayers[player].BB)) +
                        (this.SB * this.notNull(newPlayers[player].SB)) +
                        (this.AVG * this.notNull(newPlayers[player].AVG));
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
                return rv;

            }
        },
    }
</script>

<style>
    table {
        overflow: scroll;
        display: block;
        height: 80%;
        width: 100%;
        margin-top: 70px;
        position: relative;
        box-shadow: 1px 25px 15px rgb(0, 0, 0, 0.7);
        margin-left: 15px;
    }

    thead {
        font-weight: bold;
        font-size: 1.125rem;
    }

    #totalTD,
    #totalTH {
        border-left: 1px solid grey;
        border-right: 1px solid grey;
        position: relative;
    }



    #buttongroup {
        margin-top: 70px;
        min-width: 230px;
        align-items: flex-start;
        justify-content: flex-start;
        padding: 0px;
        margin-left: 30px;
        margin-right: 15px;
    }

    #wrapper {
        height: 100%;
        width: 100%;
        padding-left: 0px;
    }

    .btn-secondary:not(:disabled):not(.disabled):active,
    .btn-secondary:not(:disabled):not(.disabled).active,
    .show>.btn-secondary.dropdown-toggle {
        background-color: #404040;
    }

    th,
    td {
        width: 6%;
    }

    .p-outline {
        padding: 15px;
        width: 100%;
        box-shadow: 1px 25px 15px rgb(0, 0, 0, 0.7);
        margin-right: 0px;
    }
</style>