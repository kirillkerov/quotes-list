<template>
    <v-container fluid>
        <v-app-bar
            color="deep-purple "
            dark
            dense
        >
            <v-app-bar-title><b>Цитатник </b>Online</v-app-bar-title>
            <v-spacer></v-spacer>
            <CreateQuote/>
        </v-app-bar>
    </v-container>
</template>

<script>
import CreateQuote from "@/components/CreateQuote";

export default {
    /* eslint-disable */
    name: "Navbar",
    components: {
        CreateQuote
    }
}
</script>

<style scoped>

</style>