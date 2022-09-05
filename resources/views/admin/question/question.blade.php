@section('title', '| Questions')
@include('layouts.frontend.header')

<style>
    * {
      box-sizing: border-box;
    }
    
    body {
      background-color: #f1f1f1;
    }
    
    #regForm {
      background-color: #ffffff;
      margin: 100px auto;
      font-family: Raleway;
      padding: 40px;
      width: 70%;
      min-width: 300px;
    }
    
    /* h1 {
      text-align: center;  
    } */
    
    input {
      padding: 10px;
      width: 100%;
      font-size: 17px;
      font-family: Raleway;
      border: 1px solid #aaaaaa;
    }
    
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ffdddd;
    }
    
    /* Hide all steps by default: */
    .tab {
      display: none;
    }
    
    button {
      background-color: #04AA6D;
      color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 17px;
      font-family: Raleway;
      cursor: pointer;
    }
    
    button:hover {
      opacity: 0.8;
    }
    
    #prevBtn {
      background-color: #bbbbbb;
    }
    
    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;  
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }
    
    .step.active {
      opacity: 1;
    }
    
    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #04AA6D;
    }
</style>
<section>
    <div class="main-content mt-5 pt-5 pl-5">
        <div class="page-content">
            <div class="container-fluid">
                <div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
                    <div
                        class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_1">
                        <div class="content_wrap">
                            <h1 class="page_title">Questions</h1>
                            <div class="breadcrumbs">
                                <a class="breadcrumbs_item home" href="{{url('/home')}}">Home</a>
                                <span class="breadcrumbs_delimiter"> >> </span>
                                <span class="breadcrumbs_item current">Questions</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page_content_wrap page_paddings_yes">
                    <div class="content_wrap">
                        <div class="content">
                            <div class="isotope_wrap " data-columns="2">

                                @foreach($question as $key => $val)
                                <form action="{{route('submitAnswer')}}" method="post" id="question_form{{$val->id}}">
                                    @csrf
                                    <div class="tab">
                                        <p>
                                           {{$key+1}} ). &nbsp;  {{$val->question}}
                                            <input type="hidden" name="question_id" id="question_id" value="{{$val->id}}">
                                            <input type="hidden" name="question_type" id="question_type"
                                                value="{{$val->question_type}}">
                                        </p>
                                        <p class="mb-5">
                                            @if($val->question_type == 'text')
                                            <input type="{{$val->question_type}}" name="answer" class="form-control">
                                            @elseif($val->question_type == 'textarea')
                                            <textarea name="answer" id="answer__of_{{$val->id}}" cols="30" rows="10"
                                                class="form-control"></textarea>
                                            @elseif($val->question_type == 'radio' || $val->question_type == 'checkbox')
                                            @foreach($val->values as $key => $value)
                                            <label for="{{$value}}">{{$value}}</label>
                                            <input type="{{$val->question_type}}" name="answer[]" class="form-control"
                                                value="{{$value}}">
                                            @endforeach
                                            @elseif($val->question_type == 'select')
                                            <select name="answer" id="answer_of_{{$val->id}}" class="form-control">
                                                <option value="">--Select please--</option>
                                                @foreach($val->values as $key => $value)
                                                <option value="{{$value}}">{{ucfirst($value)}}</option>
                                                @endforeach
                                            </select>
                                            @endif
                                        </p>
                                        <button href="javaScript:void(0);" class="btn btn-outline-primary"
                                            onclick="submit_form('{{$val->id}}')" type="submit">Submit</button>
                                    </div>
                                

                                    

                                </form>
                                @endforeach
                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                      <button type="button" id="prevBtn" onclick="nextPrev(-1)" >Previous</button>
                                      <button type="button" id="nextBtn" onclick="nextPrev(1)" >Next</button>
                                    </div>
                                </div>
                                <!-- Circles which indicates the steps of the form: -->
                                <div style="text-align:center;margin-top:40px;">
                                    @foreach($question as $key => $val)
                                    <span class="step"></span>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.frontend.footer')


<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    
    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }
    
    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }
    
    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }
    
    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
</script>