<template>
    <div>
        <div class="flex-center position-ref full-height">
            <div class="container">
                <div class="row mt-4">
                    <div class="col-12">
                        <h3>Wybierz parametry i kliknij "pokaż" aby wyświetlić obiekty pasujące do kryteriów</h3>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <form>
                            <div class="row">
                                <div class="col-3 p-1">
                                    <select class="form-control" v-model="yearSelect">
                                        <option
                                            v-for="year in years"
                                            :value="year.id">
                                            {{year.year}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-3 p-1">
                                    <select class="form-control" v-model="citySelect">
                                        <option
                                            v-for="city in cities"
                                            :value="city.id">
                                            {{city.name}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-3 p-1">
                                    <select class="form-control" v-model="streetSelect">
                                        <option
                                            v-for="street in streets"
                                            :value="street.id"
                                        >
                                            {{street.name}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-3 p-1">
                                    <div v-on:click="handleChangeData" class="btn btn-success">Pokaż</div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 pl-2">
                        <ul>
                            <li v-for="el in renderElements">{{el.name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        props: ['years', 'cities', 'streets', 'elements'],

        data() {
            return {
                yearSelect: null,
                citySelect: null,
                streetSelect: null,
                renderElements: []
            }
        },

        methods: {
            handleChangeData: function () {
                this.renderElements = this.elements.filter((el, index) => ((el.year_id === this.yearSelect) && (el.city_id === this.citySelect) && (el.street_id === this.streetSelect)))
            }
        },

        mounted() {
            this.renderElements = this.elements;
        }
    }
</script>

