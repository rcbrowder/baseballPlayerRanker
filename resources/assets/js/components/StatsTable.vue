<template>
    <div id="displayDiv">

        <table class="table-dark">
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
                    <td v-for="(zscores, indexx) in zscorearray">
                        {{ zscores[index] }}
                    </td>
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
    .table {
        background-color: grey;
    }

    #displayDiv {
        overflow-y: scroll;
        display: block;
        height: 50%;
        width: 80%;
    }
</style>