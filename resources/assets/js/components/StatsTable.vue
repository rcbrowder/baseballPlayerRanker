<template>
    <!-- <div id="displayDiv"> -->

        <table class="table table-sm table-dark table-striped table-responsive table-hover header-fixed">
            <thead>
                <tr>
                    <th>Player</th>
                    <th>Position</th>
                    <th>AB</th>
                    <th>LOB</th>
                    <th>PA</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="player in total">
                    <td style="width:10%;">{{player.name}}</td>
                    <td style="width:5%;">{{player.position}}</td>
                    <td>{{ player.AB }}</td>
                    <td>{{ player.LOB }}</td>
                    <td>{{ player.LOB }}</td>
                    <td>{{ player.total }}</td>
                </tr>
            </tbody>
        </table>

    <!-- </div> -->

</template>


<script>
    export default {

        props: ['play'],

        data: () => ({
            AB: 1,
            LOB: 1,
            PA: 1,
        }),

        methods: {
            notNull: function(val) {
                if (val == null) {
                    return 0;
                }
                return val;
            }
        },


        computed: {
            total: function() {
                var newPlayers = this.play;
                for (var player in newPlayers) {
                    console.log(player);
                    console.log(newPlayers[player].total);
                    newPlayers[player].total = (this.AB * this.notNull(newPlayers[player].AB)) + (this.LOB * this.notNull(newPlayers[player].LOB)) + (this.PA * this.notNull(newPlayers[player].PA));
                }
                return newPlayers;
            },
        }
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