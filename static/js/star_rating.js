$("input[type='radio'").change(function() {
    
    const parent = this.parentElement;
    console.log(parent.children);
    const siblings = parent.children;

    $(siblings[1]).removeClass("active");
    $(siblings[3]).removeClass("active");
    $(siblings[5]).removeClass("active");
    $(siblings[7]).removeClass("active");
    $(siblings[9]).removeClass("active");
    switch (this.value) {
        case "5":
            $(siblings[9]).addClass("active");
        case "4":
            $(siblings[7]).addClass("active");
        case "3":
            $(siblings[5]).addClass("active");
        case "2":
            $(siblings[3]).addClass("active");
        case "1":
            $(siblings[1]).addClass("active");
    }
});