<html>

<head>
    <title>Live Search</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        function ajax_state(partial_state) {
            $("[name=state]").val(partial_state.toUpperCase());
            $.post("functions.php", {
                task: "ajax_state",
                partial_state: partial_state
            }, function(data) {
                $("#state_drop").fadeIn("fast");
				$("#message").empty();
                $("#state_drop ul").fadeIn("fast");
                $("#state_drop ul").html(data);
                var tagcom = $("[name=state]").val();
                $('#displayTags').on('click', '.removeTag', function() {
                    var text = $(this).parent().clone().children().remove().end().text();
                    var text1 = $("[name=p]").val();
                    $("[name=p]").val(text1.replace(text + ',', ""));
                    $(this).parent().remove();
                });
                $("#state_drop ul li").click(function() {
                    var tag = $(this).text().toUpperCase();
                    var tag1 = $("[name=p]").val();
                    var n = tag1.indexOf(tag);
                    if (n == -1) {
                        $("#displayTags").append('<span class="tag">' + tag.toUpperCase() + '<span class="removeTag">X</span>' + '</span>');
                        $("[name=p]").val(tag1.toUpperCase() + $(this).text().toUpperCase() + ',');
                        $("[name=state]").val("");
                        $("#state_drop").fadeOut("fast");
                    } else {
                        $("#message").text("Option already chosen");
                        $("#state_drop").fadeOut("fast");
                    }
                });
            });
        };
    </script>
    <style>
        #displayTags span.tag {
            display: block;
            float: left;
            color: #fff;
            background: #689;
            padding: 5px;
            padding-right: 25px;
            margin: 4px;
            border-radius: 20px;
        }
        #displayTags span.tag:hover {
            opacity: 0.7;
        }
        .removeTag {
            margin: -1px 2px;
            padding: 5px;
            font-family: Arial;
            color: white;
            font-size: 10px;
            position: absolute;
            font-weight: bold;
            cursor: pointer;
        }
        body {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        #state_drop ul li {
            font-size: 22px;
            cursor: pointer;
            color: rgb(137, 194, 197);
        }
        #state_drop ul li:hover {
            color: rgb(249, 169, 157);
        }
        #state_drop {
            width: 50%;
            height: 149px;
            position: relative;
            box-shadow: 0px 11px 22px -3px lightgrey;
            overflow: auto;
            margin-left: auto;
            margin-right: auto;
            display: none;
        }
        input {
            width: 50%;
            font-size: 22px;
            padding: 3px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }
        #state_drop ul {
            position: relative;
            z-index: 999999;
            list-style: none;
            margin: 0px;
            padding: 2px;
        }
        #displayTags {
            width: 50%;
            height: auto;
            position: relative;
            overflow: auto;
            margin-left: auto;
            margin-right: auto;
            min-height: 44px;
            max-height: 400px;
            border: 1px solid black;
        }
		#container{
			margin-right:auto;
			margin-left:auto;
			width:80%;
			text-align:center;
			font-size:30px;
		}
    </style>
</head>

<body>
    <div id="container">
		<div id="displayTags"></div>
		<input type='text' name='state' onkeyup='ajax_state(this.value)' placeholder="Enter a state.." />
		<div id="message"></div>
		<div id="state_drop" onblur="fadeoutstates()">
			<ul></ul>
		</div>
		<input type='text' name='p' />
	</div>
</body>

</html>