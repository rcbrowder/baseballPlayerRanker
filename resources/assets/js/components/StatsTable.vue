<template>
    <div id="displayDiv">

        <table class="table table-sm table-dark table-striped table-responsive-sm table-hover">
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
                    <td>{{player.name}}</td>
                    <td>{{player.position}}</td>
                    <td v-for="(zscores, indexx) in zscorearray" v-if="zscores[indexx]">{{ zscores[indexx] }}</td>
                    <td>{{ totalarray[index] }}</td>
                </tr>
            </tbody>
        </table>

    </div>

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
        overflow-y: scroll;
        display: block;
        height: 70%;
        width: 80%;
        margin-top: 60px;
    }
</style>