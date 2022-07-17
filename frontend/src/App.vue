<template>
    <v-app>
        <Navbar/>
        <div class="body mx-auto" style="max-width: 900px;">
            <QuotesList/>
        </div>
    </v-app>
</template>

<script>
import Navbar from "@/components/Navbar";
import QuotesList from "@/components/QuotesList";

export default {
    name: 'App',
    components: {
        Navbar,
        QuotesList,
    },


};
</script>
