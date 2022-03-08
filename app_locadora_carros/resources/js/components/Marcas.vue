<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <card-component titulo="Busca de Marcas">
                    <template v-slot:conteudo>
                        <div class="form-row">
                            <div class="col mb-3">
                                <input-container-component 
                                    titulo="ID" 
                                    id="inputId"
                                    id-help="idHelp"
                                    texto-ajuda="Opcional. Informe o ID da marca">
                                    <input type="number" class="form-control" id="inputId" aria-describedby="idHelp" placeholder="ID"> 
                                </input-container-component>
                            </div>
                            <div class="col mb-3">
                                <input-container-component 
                                    titulo="Nome da Marca" 
                                    id="inputNome"
                                    id-help="nomeHelp"
                                    texto-ajuda="Opcional. Informe o Nome da Marca">
                                    <input type="text" class="form-control" id="inputNome" aria-describedby="nomeHelp" placeholder="Nome da Marca"> 
                                </input-container-component>
                            </div>
                        </div>
                    </template>
                    <template v-slot:rodape>
                        <button type="submit" class="btn btn-primary btn-sm float-right">Pesquisar</button>
                    </template>
                </card-component>
                <card-component titulo="Relação de marcas">
                    <template v-slot:conteudo>
                        <table-component :dados="marcas" 
                            :titulos="{
                                id:{titulo:'ID', tipo:'texto'},
                                nome:{titulo:'Nome', tipo:'texto'},
                                imagem:{titulo:'Imagem', tipo:'imagem'},
                                created_at:{titulo:'Data de Criação', tipo:'data'}
                            }">
                        </table-component>
                    </template>
                    <template v-slot:rodape>
                        <button type="submit" class="btn btn-primary btn-sm float-right"
                        data-toggle="modal" data-target="#modalMarca">Adicionar</button>
                    </template>
                </card-component>
            </div>
        </div>
        <modal-component id="modalMarca" titulo="Adicionar Marca">
            <template v-slot:alertas>
                <alert-component tipo="success" :detalhes="detalheTransacao" v-if="statusTransacao=='adicionado'"
                titulo="Cadastro realizado com sucesso"></alert-component>
                <alert-component tipo="danger" :detalhes="detalheTransacao" v-if="statusTransacao=='erro'"
                    titulo="Erro ao cadastrar Marca"></alert-component>
            </template>
            <template v-slot:conteudo>
                <div class="form-group">
                    <div class="col mb-3">
                        <input-container-component 
                            titulo="Nome da Marca" 
                            id="novoNome"
                            id-help="novoNomeHelp"
                            texto-ajuda="Informe o Nome da Marca">
                        <input type="text" class="form-control" id="novoNome" v-model="nomeMarca"
                            aria-describedby="novoNomeHelp" placeholder="Nome da Marca"> 
                        </input-container-component>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col mb-3">
                        <input-container-component 
                            titulo="Imagem" 
                            id="novoImagem"
                            id-help="novoImagemHelp"
                            texto-ajuda="Selecione uma imagem (.png)">
                        <input type="file" class="form-control-file" id="novoImagem" @change="carregarImagem($event)"
                            aria-describedby="novoImagemHelp" placeholder="Selecione uma imagem"> 
                        </input-container-component>
                        
                    </div>
                </div>
            </template>
            <template v-slot:rodape>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" @click="salvar()">Salvar</button>
            </template>
        </modal-component>
    </div>
</template>

<script>
    export default{
        computed:{
              token(){
                  let token = document.cookie.split(';').find(indice=>{
                      return indice.includes('token=')
                  })
                  token = token.split('=')[1]
                  return 'Bearer ' + token
              }      
            },
        data(){
            return {
                urlBase:'http://localhost:8000/api/v1/marca',
                nomeMarca:'',
                arquivoImagem:[],
                statusTransacao:'',
                detalheTransacao:{},
                marcas:[]
            }
        },
        methods:{
            carregarLista(){
                let config = {
                    headers:{
                        'Accept':'application/json',
                        'Authorization':this.token
                    }
                }
                axios.get(this.urlBase, config)
                .then(response => {
                    this.marcas = response.data
                }).catch(errors => {

                })
            },
            carregarImagem(e){
                this.arquivoImagem = e.target.files
            },
            salvar(){
                let formdata = new FormData();
                formdata.append('nome', this.nomeMarca)
                formdata.append('imagem', this.arquivoImagem[0])

                let config = {
                    headers:{
                        'Content-Type': 'multipart/form-data',
                        'Accept':'application/json',
                        'Authorization':this.token
                    }
                }
                axios.post(this.urlBase,formdata, config)
                .then(response => {
                    console.log(response)
                    this.statusTransacao = 'adicionado'
                    this.detalheTransacao = {
                        mensagem: 'Código do registro '+response.data.id
                    }
                })
                .catch(errors => {
                    //console.log(errors.response.data.message)
                    this.statusTransacao = 'erro'
                    this.detalheTransacao = {
                        mensagem:errors.response.data.message,
                        dados:errors.response.data.errors
                    }
                })
            }
        },
        mounted() {
            this.carregarLista()
        },
    }
</script>
