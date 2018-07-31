<template>

    <div>

        <div v-for="category in categories">
            <div class="btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-secondary">
                    <input type="checkbox" autocomplete="off"> {{ category }}
                </label>
            </div>
        </div>

    </div>

</template>

<script>
    export default {

        data() {
            return {
                categories: {
                    '1B': 'Singles',
                    '2B': 'Doubles',
                    '3B': 'Triples',
                    'HR': 'Home Runs',
                    'BA': 'Batting Average',
                    'BB': 'Walks',
                    'XBH': 'Extra Base Hits',
                    'H': 'Extra Base Hits',
                    'HBP': 'Hit By Pitchs',
                    'K': 'Strikeouts',
                    'OBP': 'On-Base Percentage',
                    'OPS': 'On-Base Plus Slugging',
                    'R': 'Runs',
                    'RBI': 'Runs Batted In',
                    'SLG': 'Slugging Percentage',
                    'SB': 'Stolen Bases',
                    'TB': 'Total Bases',
                    'ISO': 'Isolated Power',
                    'WAR': 'Wins Above Replacement',
                    'G': 'Games Played'
                },
            };
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>