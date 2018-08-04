<template>

        <form>
            <div v-for="category in categories">
                <div class="btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary stats">
                        <input type="checkbox" v-model="toggle" true-value="1" false-value="0" autocomplete="off" name="category"> {{ category }}
                    </label>
                </div>
            </div>
            <button id="submitStats" method="get" action="/stats" type="submit" class="submitStats btn btn-outline-success mt-2">Refresh</button>
        </form>

</template>

<script>
    export default {

        props: ['categories'],

        data() {
            return {

                catString: '',
                toggle: [],

                // categories: {
                //     '1B': 'Singles',
                //     '2B': 'Doubles',
                //     '3B': 'Triples',
                //     'HR': 'Home Runs',
                //     'BA': 'Batting Average',
                //     'BB': 'Walks',
                //     'XBH': 'Extra Base Hits',
                //     'H': 'Extra Base Hits',
                //     'HBP': 'Hit By Pitchs',
                //     'K': 'Strikeouts',
                //     'OBP': 'On-Base Percentage',
                //     'OPS': 'On-Base Plus Slugging',
                //     'R': 'Runs',
                //     'RBI': 'Runs Batted In',
                //     'SLG': 'Slugging Percentage',
                //     'SB': 'Stolen Bases',
                //     'TB': 'Total Bases',
                //     'ISO': 'Isolated Power',
                //     'WAR': 'Wins Above Replacement',
                //     'G': 'Games Played'
                // },
            };
        },

        mounted() {

        }
    }
</script>

<style>
    .stats {
        width: 100%;
        border-radius: 0;
        padding: 5%;
        /* margin-left: 50%; */
    }

    #submitStats {
        width: 100%;
        border-radius: 0;
        /* margin-left: 50%; */
    }

    .btn-group-toggle {
        width: 100%;
    }
</style>