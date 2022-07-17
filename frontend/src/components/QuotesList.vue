<template>
    <v-container grid-list-md text-xs-center v-bind="{ [`grid-list-xl`]: true }">
        <div class="text-center">
            <v-pagination
                v-model="pagination.current"
                :length="pagination.total"
                prev-icon="mdi-menu-left"
                next-icon="mdi-menu-right"
                color="deep-purple"
                @input="onPageChange"
            ></v-pagination>
        </div>

        <v-layout
            v-if="quotes && quotes.length"
            row
            wrap
        >
            <v-flex
                v-for="quote in quotes" :key="quote.id"
                class="col-12"
            >
                <v-card
                    class="mx-auto"
                    outlined
                    shaped
                    :elevation="15"
                >
                    <v-list-item three-line>
                        <v-list-item-content>
                            <div class="text-start mb-1">
                                <v-chip-group
                                    column
                                >
                                    <v-chip
                                        v-for="tag in quote.tags" :key="tag.id"
                                        small
                                    >
                                        {{ tag.name }}
                                    </v-chip>
                                </v-chip-group>
                            </div>

                            <v-list-item
                                class="font-weight-regular pa-0 mb-1"
                            >
                                <v-icon
                                    dense
                                    class="mr-1"
                                >
                                    mdi-account
                                </v-icon>
                                {{ quote.author }}
                            </v-list-item>
                            <v-list-item
                                class="text-h6 font-weight-bold pa-0 mb-1"
                            >
                                <i class="deep-purple--text">"{{ quote.text }}"</i>
                            </v-list-item>
                            <v-list-item-subtitle
                                class="text-end"
                            >
                                {{ getFormattedData(quote.created_at) }}
                            </v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>
                </v-card>
            </v-flex>
        </v-layout>

        <div class="text-center">
            <v-pagination
                v-model="pagination.current"
                :length="pagination.total"
                prev-icon="mdi-menu-left"
                next-icon="mdi-menu-right"
                color="deep-purple"
                class="mt-3"
                @input="onPageChange"
            ></v-pagination>
        </div>
    </v-container>
</template>

<script>
import axios from "axios";
import { format } from 'fecha';

export default {
    /* eslint-disable */
    name: "QuotesList",
    data: () => ({
        quotes: [],
        pagination: {
            current: 1,
            total: 0,
        }
    }),
    methods: {
        getFormattedData(data) {
            return format(new Date(data), 'DD.MM.YYYY hh:mm')
        },
        getQuotes() {
            axios.get('http://a0697349.xsph.ru/api/quotes?page=' + this.pagination.current)
                .then(response => {
                    this.quotes = response.data.data;
                    this.pagination.current = response.data.meta.current_page;
                    this.pagination.total = response.data.meta.last_page;
                });
        },
        onPageChange() {
            this.getQuotes();
        },
    },
    mounted() {
        this.getQuotes();
    },
}
</script>

<style scoped>

</style>