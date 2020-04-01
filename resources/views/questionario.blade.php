<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Art4You · Questionario</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Lobster&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/questionario.css')}}">

</head>


<div class="container">
    <div class="row">
        <section>
            <div class="wizard">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-picture"></i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-briefcase"></i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <form role="form" id="form" data-toggle="validator">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" role="tabpanel" id="step1">
                            <div class="container-fluid myData">
                                <div class="row col-md-12">
                                    <div class="col-md-8">
                                        <h2 class="text-center">Welcome Manpreet!</h2>
                                        <h2>Personal Info</h2>
                                        <h3>Step 1 - Kindly Provide your Personal Info</h3>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <label for="age">Age</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="number" min="0" class="form-control" placeholder="Age" aria-describedby="basic-addon1" id="age" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <label for="gender">Gender</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <select class="form-control" id="gender" required>
                                                <option value="None" disabled selected required>None</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <label for="city">City <small>(Optional)</small></label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="City" aria-describedby="basic-addon1" id="city" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <label for="country">Country <small>(Optional)</small></label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Country" aria-describedby="basic-addon1" id="country" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-4 pull-right">
                                        <button type="button" class="btn btn-success next-step">Save and continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="step2">
                            <div class="container-fluid myData">
                                <div class="row col-md-12">
                                    <div class="col-md-8">
                                        <h2>Set your Avatar</h2>
                                        <h3>Step 2 - Come on.. Put a Face to that name..</h3>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <label for="avatar">Picture</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="file" id="avatar" />
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                <span class="sr-only">0% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li>
                                            <button type="button" class="btn btn-default prev-step">Previous</button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-success next-step">Save and continue</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="step3">
                            <div class="container-fluid myData">
                                <div class="row col-md-12">
                                    <div class="col-md-8">
                                        <h2>Career and Profession</h2>
                                        <h3>Step 3 - Kindly Provide your Professional Info</h3>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <label for="jobTitle">Job Title</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Job Title" aria-describedby="basic-addon1" id="jobTitle" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <label for="startupName">Startup Name</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Startup Name" aria-describedby="basic-addon1" id="startupName">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <label for="education">Education</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <select class="form-control" id="education" required>
                                                <option value="None" disabled selected>None</option>
                                                <option value="primary">Primary School</option>
                                                <option value="secondary">Secondary School</option>
                                                <option value="bachelor">Bachelor's Degree</option>
                                                <option value="postGraduate">Post Graduate Degree</option>
                                                <option value="associate">Associate Degree</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li>
                                            <button type="button" class="btn btn-default prev-step">Previous</button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-default next-step">Skip</button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-success next-step">Save and continue</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="complete">
                            <div class="container-fluid myData">
                                <div class="row col-md-12">
                                    <div class="center-block text-center">
                                        <h2>Thank you for Joining Multiplier<span style="color:#f48260;" class="glyphicon glyphicon-heart"></span></h2>
                                        <input type="submit" class="btn btn-success" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function() {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function(e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function(e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });

        $(".next-step").click(function(e) {
            $('#form').validator().on('submit', function(e) {
                if (e.isDefaultPrevented()) {
                    // handle the invalid form...
                    alert("Failed");
                } else {
                    // everything looks good!
                    alert("Successful!");
                }
            });
        });



        //End of Doc Ready
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
</script>

</html