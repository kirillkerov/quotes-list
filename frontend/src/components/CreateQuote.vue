<template>
    <v-dialog v-model="dialog" max-width="500px">
        <template v-slot:activator="{ on }">
            <div class="d-flex">
                <v-btn color="white" outlined dark class="ml-auto ma-3" v-on="on">
                    Добавить цитату
                    <v-icon
                        class="ml-1"
                        small
                    >
                        mdi-plus-circle-outline
                    </v-icon>
                </v-btn>
            </div>
        </template>
        <v-card>
            <v-card-title>
                <span>Добавить новую цитату</span>
            </v-card-title>
            <v-card-text>
                <v-form
                    v-model="valid"
                >
                    <v-row>
                        <v-col cols="12">
                            <v-text-field
                                v-model="editedItem.author"
                                label="Автор"
                                :rules="inputRules"
                                required
                                color="deep-purple darken"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <v-text-field
                                v-model="editedItem.text"
                                label="Текст"
                                :rules="inputRules"
                                required
                                color="deep-purple darken"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <v-autocomplete
                                :items="tags"
                                v-model="editedItem.tags"
                                item-value="id"
                                item-text="name"
                                :return-object="true"
                                label="Темы.."
                                outlined
                                clearable
                                multiple
                                hide-selected
                                small-chips
                                :rules="comboboxRules"
                                required
                                color="deep-purple darken"
                            >
                            </v-autocomplete>
                        </v-col>
                    </v-row>
                </v-form>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="deep-purple darken" text @click="showEditDialog()">Закрыть</v-btn>
                <v-btn :disabled="!valid" color="deep-purple darken white--text" @click="saveItem(editedItem)">Отправить</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import axios from 'axios';

export default {
    /* eslint-disable */
    name: "CreateQuote",
    data () {
        return {
            valid: true,
            inputRules: [
                v => !!v || 'Обязательное поле',
            ],
            comboboxRules:[
                v => !!v || 'Обязательное поле',
                v => (v && v.length >= 1 && v.length < 4) || 'Обязательно выбрать 1, но не более 3',
            ],
            items: [],
            dialog: false,
            editedItem: {},
            dialogDelete: false,
            tags: [],
            select: ['Vuetify', 'Programming'],
        }
    },
    methods: {
        showEditDialog() {
            this.dialog = !this.dialog
        },
        saveItem(item) {
            axios.post('http://a0697349.xsph.ru/api/quotes', item).then((response) => {
                if (response.data) {
                    this.editedItem = {}
                }
                this.dialog = !this.dialog
                location.reload();
            })
        },
    },
    mounted() {
        axios
            .get('http://a0697349.xsph.ru/api/tags')
            .then(response => {
                this.tags = response.data.data
            })
    }
}
</script>

<style scoped>

</style>