<template>
    <h1>Hello {{ name }} {{ surname }}</h1>
    <ul>
        <li v-for="framework of frameworks" v-text="framework"></li>
    </ul>
</template>

<script>
    export default {
        props: {
            name: String,
            surname: String,
            frameworks: Array
        }
    };
</script>
