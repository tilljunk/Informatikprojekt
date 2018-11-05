<?php
include("header.php");
?>


<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="basiswissen">
      <div class="container">
        <h1>Basic knowledge</h1>
      </div>
    </div>



<div class="container" id="content">
	<div class="row">
  		<div class="col-md-5">
  		<h3 class="h_stichproben">Sample types</h3>


<button style="width:150px;" type="button" id="po_button" class="btn btn-default" data-html="true" data-container="body" data-toggle="popover" data-placement="top" data-content="<p><strong>Variation with repetition</strong><br/>The order is important.<br/>Formula: <img src='bilder/variation3.jpg'></p>" data-original-title="" title="">Variation</br>w-rep</button>
<button style="width:150px;" type="button" id="po_button2" class="btn btn-default" data-html="true" data-container="body" data-toggle="popover" data-placement="top" data-content="<p><strong>Combination with repetition</strong><br/>The order is unimportant.<br/>Formula: <img src='bilder/kombi3.jpg'></p>" data-original-title="" title="">Combination</br>w-rep</button><br/>
<button style="width:150px;" type="button" id="po_button3" class="btn btn-default" data-html="true" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<p><strong>Variation without repetition</strong><br/>The order is important.<br/>Formula: <img src='bilder/variation1.png'></p>" data-original-title="" title="">Variation</br>w/o-rep</button>
<button style="width:150px;" type="button" id="po_button4" class="btn btn-default" data-html="true" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<p><strong>Combination without repetition</strong><br/>The order is unimportant.<br/>Formula: <img src='bilder/kombi1.jpg'></p>" data-original-title="" title="">Combination</br>w/o-rep</button>
<br/><br/>
<div class="panel-group" id="accordion">
  		<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapsevari">
          Variation
        </a>
      </h4>
    </div>
    <div id="collapsevari" class="panel-collapse collapse">
      <div class="panel-body">
       In a variation we draw k elements out of a set of n elements. The ordering in the resulting list of k elements is important.<br/><br/>
       <strong>Explanation</strong><br />
       <strong>n:</strong> Number of objects in the set<br />
       <strong>k:</strong> Number of drawings = elements in the result list<br />
       <br />
       If every element in the set can only be drawn once, then it is a variation without repetition <strong>(w/o-rep)</strong>.<br/>
       Formula: <img src="../bilder/variation1.png"><br/>
       <strong>Example:</strong><br/>
       A horse race with 10 horses takes place. How many possibilities are there for the first three places?<br/>
       Solution: <img src="../bilder/variation2.png"><br/><br/>
       <strong>Example with urn model:</strong><br/>
       A contest with 10 participants takes place. How many possibilities are there for the top 3?<br/>
       <img src="../bilder/urne_zoz_contest.png">
       <br/><br/>
       If every element in the set can be drawn multiple times, then it is a variation with repetition <strong>(w-rep)</strong> <br/>
       Formula: <img src="../bilder/variation3.jpg"><br/>
       <strong>Example:</strong><br/>
       How many possibilities are there to form a word with 5 letters from the alphabet?<br/>
       Solution: <img src="../bilder/variation4.jpg"><br/><br/>
       <strong>Example with urn model:</strong><br/>
       A 4-digit bike lock allows to set each digit to one of the values 0 to 9. How many possible codes exist?<br/>
       <img src="../bilder/urne_fahrradschloss.png">
       </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapsekomb">
          Combination
        </a>
      </h4>
    </div>
    <div id="collapsekomb" class="panel-collapse collapse">
      <div class="panel-body">
       In a combination we draw k elements out of a set of n elements. The ordering in the resulting subset of k elements is unimportant.<br/><br/>
       <strong>Explanation</strong><br />
       <strong>n:</strong> Number of objects in the set<br />
       <strong>k:</strong> Number of drawings = elements in the result subset<br />
       <br />
       If every element in the set can only be drawn once, then it is a combination without repetition <strong>(w/o-rep)</strong>.<br/><br />
       Formula: <img src="../bilder/kombi1.jpg"><br/><br />
       <strong>Example:</strong><br/>
       Lotto 6/49: Count the number of possible outcomes!<br/>
       Solution: <img src="../bilder/kombi2.jpg"><br/>
       <img src="../bilder/urne_zoz_kombinatorik.png">
       <br/><br/>
       If every element in the set can be drawn multiple times, then it is a combination with repetition <strong>(w-rep)</strong> <br/>
       <br />
       Formula: <img src="../bilder/kombi3.jpg"><br/>
       <br />
       <strong>Example:</strong><br/>
       We draw 3 times out of an urn with 6 balls and return each time the ball drawn into the urn.<br/>
       Solution: <img src="../bilder/kombi4.jpg"><br/><br/>
       <strong>Example with urn model</strong><br/>
       A fruit seller packs bags of 10 fruits from 4 different types of fruits as a special offer. How many differing bags of fruit are possible?<br/>
       <br />
       Solution: <img src="../bilder/kombination_zmz_obsttueten.png">
       <br /> <br />
       n-1 is the number of separator sheets needed in order to separate in the ordered list of objects, e. g. AA|BBB|C|DDDDD the (here: 4) 
object classes. This is the reason for „n-1“ in the formula.
       <br /><br />
       <img src="../bilder/urne_zmz_fruechte.png">
       </div>
    </div>
  </div>
    
  </div>

  		</div>
  		<div class="col-md-6">
		<h3 class="h_zusatzwissen">Special topics</h3>
  		<div class="panel-group" id="accordionzwei">
  		
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseOne">
          Permutation
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
	  Permutation is a special form of variation, where all n elemnts are drawn w/o repetition (n=k).<br><br>
       <strong>Example:</strong><br/>
       In a treasure hunt game all 5 stations have to be reached. The set of stations n is 5, thus k is 5 as well, since all stations have to be reached.
       </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseTwo">
          Laplace probability
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
                          With Laplace probability, all events of an experiment have the same probability.<br>
                           <table><tr>
                           <td style="padding-top:10px; padding-right:10px;">P(A) = </td><td><u>Number of events which satisfy condition A</u></td><td style="padding-top:10px; padding-right:10px; padding-left:10px;"> = </td><td><u>desired events</u></td>
                           </tr><tr>
                           <td></td><td>Number of all possible events </td><td></td><td>possible events</td></tr>
                           </table>
                            <br>
                             <br>
                            <strong>Example:</strong>
                           <p>How high is the probability to roll a 4 with a six-sided dice?<br>
                           P({4})  = 1/6<br><br>
                           How high ist he probability to roll a 3 or a 5 with a six-sided dice?<br>
                           P({3, 5}) = 2/6</p>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseThree">
          Factorial
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <p>n! is read „n-factorial“. <br/>
        Formula: n! = 1 ∙ 2 ∙…∙ n, n ∈ <img src="../bilder/natuerlichezahl.png"><br/><br/>
      	<strong>Example:</strong><br/>
      	5! = 1 ∙ 2 ∙ 3 ∙ 4 ∙ 5	
		<br/><br/>	
		<strong>Special rule:</strong><br/>
		0! = 1</p>
      </div>
    </div>
  </div>
    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseFour">
          Binomial coefficient
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        For n, k ∈ <img src="../bilder/natuerlichezahl.png"> &cup; {0} with k ≤ n the binomial coefficient is defined as:<br/>
        <img src="../bilder/binomialko.jpg"><br/>
		(The last rule holds only for k > 0.)
        <br/>
        <strong>Example:</strong><br>
        <img src="../bilder/binomialko_1.jpg"><br/><br/>
        <strong>A few rules</strong><br>
        <img src="../bilder/binomialko_2.jpg">
      </div>
    </div>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseFive">
          Sum rule
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">
       <strong>Sum rule</strong><br/>
There are n elements with property a and m elements with property b. The a and b properties cannot be taken or occur at the same time. Therefore, there are n+m possibilities to select one object with property a or b. 
<br/>
<strong>Example:</strong><br/>
In a car rental company there are 3 small cars and 7 middle-sized cars. When you need to choose one of the cars, you have in total 3+7 possibilities to choose.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseSix">
          Product rule
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse">
      <div class="panel-body">
       	<strong>Product rule</strong><br/>
		If a problem can be divided into 2 subproblems which are executed one after another, and if there are n possibilities for the 1st subproblem and m possibilities for the 2nd subproblem, then there are n*m possibilities in total.
		<br /><br />
		<strong>Example:</strong><br /> There are 3 routes from Gummersbach to Cologne and 4 routes from Cologne to Aachen. Then there are in total 3*4 = 12 possible routes from Gummersbach to Aachen.
      </div>
    </div>
  </div>
</div>
  		</div>
	</div>
	
</div>

<?php
include("footeroz.php");
?>