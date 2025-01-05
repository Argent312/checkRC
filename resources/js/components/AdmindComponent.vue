<template>
    <div class="" v-if="tableactive">

        <button class="btn btn-primary btn-sm" 
            @click="add()">Agregar
        </button>
        <br><br>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h3>Lista de Actividades:</h3>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col">Actividad</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Check</th>
                            </tr>
                        </thead>
                        <tbody v-for="(item, index) in list" :key="index">
                            <tr>
                                <td>{{item.category}}</td>
                                <td>{{item.name}}</td>
                                <td>{{item.owner}}</td>
                                <td> <button class="btn btn-primary btn-sm" 
                                    @click="editar(item)">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>


    <!--Formulario para editar las actividades-->
    <form v-on:submit.prevent="edit" class="mt-3 mb-3 border border-dark bordder-3 p-3" v-if="formactive">
        <h2>Modificacion de Actividad</h2>
        
        <br><br>
        
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <input v-model="actividad.category" type="text" class="form-control" id="category">
        </div>   
        <div class="mb-3">
            <label for="name" class="form-label">Actividad</label>
            <input v-model="actividad.name" type="text" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="owner" class="form-label">Responsable</label>
            <input v-model="actividad.owner" type="text" class="form-control" id="owner">
        </div>

        
        <button @click="cancelar" type="button" class="me-2 btn btn-warning">Cancelar</button>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>



    <!--Formulario para agregar actividades-->
    <form v-on:submit.prevent="adds" class="mt-3 mb-3 border border-dark bordder-3 p-3" v-if="addactive">
       
        <h2>Agregar de Actividad</h2>
        
        <br><br>
        
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <input v-model="actividad.category" type="text" class="form-control" id="category">
        </div>    
        <div class="mb-3">
            <label for="name" class="form-label">Actividad</label>
            <input v-model="actividad.name" type="text" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="owner" class="form-label">Responsable</label>
            <input v-model="actividad.owner" type="text" class="form-control" id="owner">
        </div>

        
        <button @click="cancelar" type="button" class="me-2 btn btn-warning">Cancelar</button>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>

</template>

<script>
    export default {
        data() {
            return {
                formactive: false,
                tableactive: true,
                lists: [],
                //modoEditar: false,
                list: {name: '', state: ''},


                actividad:[],
                actividad:{
                    id:'',
                    name:'',
                    owner:'',
                    category:'',
                }
            }
        },
        created(){
            
            axios.get('/lista').then(res=>{
            this.list = res.data;
            
            })
        },
        methods:{

            //Metodo para agregar un nuevo registro AUN EN PRODUCCION
            add(){
                this.actividad.name = '';
                this.actividad.owner = '';
                this.actividad.category = '';
                this.actividad.id = '';

                this.formactive = false;
                this.tableactive = false;
                this.addactive = true;
            },
            adds(){
            
                const params={
                    name:this.actividad.name,
                    category:this.actividad.category,
                    owner:this.actividad.owner,
                    id:this.actividad.id
                }
                axios.post('/add', params).then(res=>{
                    this.list = res.data;
            
                })
            },
            //Activar el formulario de edicion, y ocultar la tabla de registros
            editar(item){
                this.formactive = true;
                this.tableactive = false;
                this.addactive = false;

                this.actividad.name = item.name;
                this.actividad.owner = item.owner;
                this.actividad.category = item.category;
                this.actividad.id = item.id
            },
        //cancelar la edicion del registro, ocultar el formulario y activar la tabla de todos los registros
        cancelar(){
            this.formactive = false;
            this.tableactive = true;
            this.addactive = false;
        },

        //Metodo a modificar desarrollo
        edit(){
            const params={
                name:this.actividad.name,
                category:this.actividad.category,
                owner:this.actividad.owner,
                id:this.actividad.id
            }
            axios.put(`/edit/${this.actividad.id}`, params).then(res=>{
                        
                        
                        this.list = res.data;  
                    })
                
                this.formactive = false;
                this.tableactive = true;
                this.addactive = false;
                
        }
    }}
</script>


