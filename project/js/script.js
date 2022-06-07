$(function() {
    let i = 1;
    $("body").on("click", ".sbtn-add", function(e) {

        if (i < 3) {
            i++;
            e.preventDefault();
            let ol = $(this).closest("ol")
            let li = $(this).closest("li").clone()
            li.appendTo(ol)
            li.find("input").val("")
            li.find(".sbtn-remove").show()
            li.find("[name='stitle[]']").focus()
            li.find("[name='ttitle[]']").focus()
        }
        // console.log(i);
    })

    $("body").on("click", ".sbtn-remove", function(e) {
        i = i - 1;
        e.preventDefault();
        $(this).closest("li").remove()
            // console.log(i);
    })

    let j = 1;
    $("body").on("click", ".tbtn-add", function(e) {

        if (j < 2) {
            j++;
            e.preventDefault();
            let ol = $(this).closest("ol")
            let li = $(this).closest("li").clone()
            li.appendTo(ol)
            li.find("input").val("")
            li.find(".tbtn-remove").show()
            li.find("[name='stitle[]']").focus()
            li.find("[name='ttitle[]']").focus()
        }
        // console.log(j);
    })

    $("body").on("click", ".tbtn-remove", function(e) {
        j = j - 1;
        e.preventDefault();
        $(this).closest("li").remove()
            // console.log(j);
    })
})