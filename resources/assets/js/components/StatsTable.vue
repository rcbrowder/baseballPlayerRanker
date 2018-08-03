<template>
    <div id="displayDiv">

        <table class="table">
            <thead>
                <tr>
                    <td v-for="category in categories">{{ category }}</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="player in players">
                    <td v-for="stat in stats">{{ stat.zscore }}</td>
                </tr>
            </tbody>
        </table>

    </div>

</template>


<script>
    export default {
        props: ['stats', 'players', 'categories'],

        data: () => ({

        }),
    }
</script>

<style>
    .table {
        background-color: grey;
        margin-top: 50px;
        width: 50%;
        height: 60%;
        overflow-y: scroll;
    }

    #displayDiv {
        overflow-y: scroll;
        display: block;
        height: 50%;
        width: 60%;
    }
</style>