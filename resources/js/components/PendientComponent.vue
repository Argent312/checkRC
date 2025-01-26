<template>

    <div class="" v-if="tableactive">

        <button class="btn btn-primary btn-sm" 
            @click="add()">Agregar
        </button>
        <br><br>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h3>Lista de Pendientes:</h3>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Urgencia</th>
                                <th scope="col">Actividad</th>
                                <th scope="col">Involucrado</th>
                                <th scope="col">Check</th>
                            </tr>
                        </thead>
                        <tbody v-for="(item, index) in list" :key="index">
                            <tr>
                                <td>{{item.urgencia}}</td>
                                <td>{{item.name}}</td>
                                <td>{{item.compartido}}</td>
                                <td> <button class="btn btn-warning btn-sm" 
                                    @click="edit(item.id)">Check</button>
                                </td>   
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>



    <!--Formulario para agregar actividades a los eventos-->
    <form v-on:submit.prevent="adds" class="mt-3 mb-3 border border-dark bordder-3 p-3" v-if="addactive">
       
        <h2>Agregar de Actividad</h2>
        
        <br><br>
        
        <div class="mb-3">
            <label for="evento" class="form-label">Urgencia</label>
            <br>
            <select v-model="actividad.urgencia" name="urgencia" id="urgencia">
                
                <option value="alta">Alta</option>
                <option value="baja">Baja</option>
            </select>
        </div>    
        <div class="mb-3">
            <label for="name" class="form-label">Actividad</label>
            <input v-model="actividad.name" type="text" class="form-control" id="name">
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
                    urgencia:'',
                    compartido:'',
                }
            }
        },
        created(){
            
            axios.get('/listaPendientes').then(res=>{
            this.list = res.data;
            
            })
        },
        methods:{

            //Metodo para agregar un nuevo registro AUN EN PRODUCCION
            add(){
                this.actividad.name = '';
                this.actividad.urgencia = '';
                this.actividad.id = '';

                this.formactive = false;
                this.tableactive = false;
                this.addactive = true;
            },
            adds(){
            
                const params={
                    name:this.actividad.name,
                    urgencia:this.actividad.urgencia,
                    id:this.actividad.id
                }
                
                axios.post('/addPendientes', params).then(res=>{
                    
                    this.list = res.data;
            
                })
                this.formactive = false;
                this.tableactive = true;
                this.addactive = false;
            },
            cancelar(){
            this.formactive = false;
            this.tableactive = true;
            this.addactive = false;
        },
            edit(item){
            const variableId=item // El ID de la variable que deseas editar
            
            const data = {
                state: '0',
            };
            axios.put(`/listPendientes/${variableId}`)
                .then(res=>{
                    this.list.splice(variableId, 1);
                    this.list = res.data;  

                
        })
    }
    }}
</script>
