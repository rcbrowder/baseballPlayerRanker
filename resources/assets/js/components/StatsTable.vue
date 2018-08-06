<template>
    <!-- <div id="displayDiv"> -->

        <table class="table table-sm table-dark table-striped table-responsive table-hover header-fixed">
            <thead>
                <tr>
                    <th>Player</th>
                    <th>Position</th>
                    <th v-for="category in categories">{{ category }}</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(player,index) in players">
                    <td style="width:10%;">{{player.name}}</td>
                    <td style="width:5%;">{{player.position}}</td>
                    <td v-for="(zscores, indexx) in zscorearray" v-if="zscores[indexx]">{{ zscores[index] }}</td>
                    <td>{{ totalarray[index] }}</td>
                </tr>
            </tbody>
        </table>

    <!-- </div> -->

</template>


<script>
    export default {
        props: ['zscorearray', 'players', 'categories', 'totalarray'],

        data: () => ({

        }),
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