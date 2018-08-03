<template>

    <table class="table">
        <thead>
            <tr class="font-weight-bold">
                <td>Name</td>
                <td>Position</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="stat in stats">
                <td>{{ stat.name }}</td>
                <td>{{ stat.position }}</td>
            </tr>
        </tbody>
    </table>

</template>


<script>
    export default {
        props: ['stats'],

        data: () => ({

        }),
    }
</script>