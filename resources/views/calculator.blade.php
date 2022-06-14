@extends('index')

@section('content')
    <section>
        <div class="container">
            <div id="display">
                <span>@{{display}}</span><br/>
            </div>
            <div class="buttons">
                <div class="button" @click="clear()">C</div>
                <div class="button" @click="setOperation('/')">/</div>
                <div class="button" @click="setOperation('*')">*</div>
                <div class="button" @click="unshiftInput()">&larr;</div>
                <div class="button" @click="setNumbers(7)">7</div>
                <div class="button" @click="setNumbers(8)">8</div>
                <div class="button" @click="setNumbers(9)">9</div>
                <div class="button" @click="setOperation('-')">-</div>
                <div class="button" @click="setNumbers(4)">4</div>
                <div class="button" @click="setNumbers(5)">5</div>
                <div class="button" @click="setNumbers(6)">6</div>
                <div class="button" @click="setOperation('+')">+</div>
                <div class="button" @click="setNumbers(1)">1</div>
                <div class="button" @click="setNumbers(2)">2</div>
                <div class="button" @click="setNumbers(3)">3</div>
                <div class="button" >.</div>
                <div class="button" >(</div>
                <div class="button" @click="setNumbers(0)">0</div>
                <div class="button">)</div>
                <div id="equal" class="button" @click="calculate()">=</div>
            </div>
        </div>
    </section>
@endsection
