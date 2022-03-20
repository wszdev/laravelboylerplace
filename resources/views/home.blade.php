@extends('layouts.app')



@section('content')
    <div class="container">
        <h1>This is content</h1>
        {{-- <button class="btn btn-primary btn-hover migMake">Make migration</button> --}}
        {{-- <button class="btn btn-danger btn-hover deleteMig">Reset Database</button> --}}

        <div class="row">
            <div class="col-3">
                <button class="btn btn-success btn-lg btn-hover" id="runCode">Run the code</button>
                <button class="btn" id="redircts">Go to admin</button>
            </div>
            <div class="col-9">
                <div id="restuls" class="border">

                </div>

            </div>
        </div>
    </div>
@endsection





@section('site-js')
    <script>
        function domS(selval){
            var selectedElement = document.querySelector(selval);
            return selectedElement;
        }



        domS('#runCode').addEventListener('click', function(){
            runController()
        })
        
        function runController(){
            axios.get('/run')
            .then(function(res){
                if(res.status == 200){
                    domS('#restuls').innerHTML= res.data;
                    domS('#restuls').classList.add('border-success')
                    console.log(res)
                }else{
                    domS('#restuls').classList.add('border-danger')
                }
                
            })
            .catch(function(error){
                console.log(error)
            })
        }
    </script>



    <script>
        // document.querySelector('.migMake');
        // document.querySelector('.migMake').addEventListener('click', function(){
        //     makeMigration()
        // })
        
        // function makeMigration(){
        //     axios.get('/make-migration',)
        //     .then(function(res){
        //         console.log(res);
        //     })
        //     .catch(function(error){
        //         console.log(error)
        //     })
        // }

    </script>


@endsection