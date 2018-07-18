<template>

    <div class="btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary">
            <input type="checkbox" autocomplete="off">At bats
    </div>

</template>

<script>
    export default {

        data: () => ({
            categories: [
                '1B'=>'Singles',
                '2B'=>'Doubles',
                '3B'=>'Triples',
                'HR'=>'Home Runs',
                'BA'=>'Batting Average',
                'BB'=>'Walks',
                'XBH'=>'Extra Base Hits',
                'H'=>'Extra Base Hits',
                'HBP'=>'Hit By Pitchs',
                'K'=>'Strikeouts',
                'OBP'=>'On-Base Percentage',
                'OPS'=>'On-Base Plus Slugging',
                'R'=>'Runs',
                'RBI'=>'Runs Batted In',
                'SLG'=>'Slugging Percentage',
                'SB'=>'Stolen Bases',
                'TB'=>'Total Bases',
                'ISO'=>'Isolated Power',
                'WAR'=>'Wins Above Replacement',
                'G'=>'Games Played'
             ],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }),

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
