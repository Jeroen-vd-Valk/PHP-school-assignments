// wait for the entire page to load
window.addEventListener("load", (event) => {
    const redSlider = document.getElementById("redSlider");
    const greenSlider = document.getElementById("redSlider");
    const blueSlider = document.getElementById("redSlider");
    
    document.getElementById("redSlider").addEventListener("input", () => {
        const redSlider = document.getElementById("redSlider").valueAsNumber;
        updateBackgroundColour();
    });

    document.getElementById("greenSlider").addEventListener("input", () => {
        const greenSlider = document.getElementById("greenSlider").valueAsNumber;
        updateBackgroundColour();
    });

    document.getElementById("blueSlider").addEventListener("input", () => {
        const blueSlider = document.getElementById("blueSlider").valueAsNumber;
        updateBackgroundColour();
    });


});

function updateBackgroundColour(){
    const red = redSlider.value;
    const green = greenSlider.value;
    const blue = blueSlider.value;

    document.body.style.backgroundColor = 'rgb(' + (red) + ',' + (green) + ',' + (blue) + ')';
}
