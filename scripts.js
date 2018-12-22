$(document).ready(function () {
  $(".btn").click(function () {
    let title = $(".title").val();
    let subtitle = $(".subtitle").val();
    let author = $(".author").val();
    let color = $(".color").val();
    let publisher = $(".publisher").val();
    let year = $(".year").val();

    $(".c_title").text(title);
    $(".c_subtitle").text(subtitle);
    $(".c_author").text(author);
    $(".c_publisher").text(publisher);
    $(".c_year").text(year);

    $(".cover").css("background-color", color);
  });
});