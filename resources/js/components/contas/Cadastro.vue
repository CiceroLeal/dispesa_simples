<template>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="corpo">
                <div class="form-group">
                    <label class="">Descrição: </label>
                    <input type="text" class="form-control" v-model="form.descricao">
                </div>

                <div class="form-group">
                    <label class="">Parcelas: </label>
                    <input type="number" class="form-control" v-model="form.parcelas">
                </div>
                <div class="form-group">
                    <div>
                        <label class="">Pago: </label>
                    </div>
                    <div>
                        <b-form-radio v-model="form.pago" name="pago" value="1">
                            Sim
                        </b-form-radio>
                        <b-form-radio v-model="form.pago" name="pago" value="0">
                            Não
                        </b-form-radio>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="form-group">
                    <div>
                        <label class="">Fixo: </label>
                    </div>
                    <div>
                        <b-form-radio v-model="form.fixo" name="fixo" value="1">
                            Sim
                        </b-form-radio>
                        <b-form-radio v-model="form.fixo" name="fixo" value="0">
                            Não
                        </b-form-radio>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="form-group">
                    <label class="">Tipo: </label>
                    <select2 :options="options" v-model="form.tipo" language="pt-br"></select2>
                </div>
                <div class="form-group">
                    <label class="">Data de Vencimento: </label>
                    <datepicker :language="ptBR" v-model="form.dt_vencimento" :format="customFormatter" style="position: absolute"></datepicker>
                </div><br>
                <div class="form-group">
                    <label class="">Valor: </label>
                    <br>
                    <money v-model="form.valor" v-bind="money" :value="result"></money>
                </div>
                <router-link to="/" class="btn btn-primary">Voltar</router-link>
                <button type="button" @click="salvar" class="btn btn-success">Criar</button>
            </div>
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import moment from 'moment';
    import {ptBR} from 'vuejs-datepicker/dist/locale';
    import select2 from 'v-select2-component';
    import {Money} from 'v-money';

    export default {
        data(){
            return {
                ptBR: ptBR,

                form: {
                    descricao: '',
                    parcelas: '',
                    pago: '',
                    fixo: '',
                    tipo: '',
                    dt_vencimento: '',
                    valor: '',
                },

                options: [
                    {
                        text: "Categoria",
                        id: "1"
                    }, {
                        text: "Conta",
                        id: "2"
                    }
                ],

                money: {
                    decimal: ',',
                    thousands: '.',
                    prefix: 'R$ ',
                    precision: 2,
                    masked: false
                },

                result: "",
            }
        },

        methods: {
            customFormatter(date) {
                return moment(date).format('DD/MM/YYYY');
            },

            salvar(){
                this.form.dt_vencimento = moment(this.form.dt_vencimento).format('YYYY-MM-DD');

                if(this.form.pago == 1)
                    this.form['qtd_pagos'] = this.form.parcelas;

                axios.post('/conta', this.form).then(function (resp) {
                    console.log(resp);
                })
            }
        },

        components:{
            Datepicker,
            select2,
            Money
        }
    }
</script>
