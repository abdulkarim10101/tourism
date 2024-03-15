<div class="popup">
    <button class="close">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18" />
            <path d="m6 6 12 12" />
        </svg>
    </button>
    <h3 id="popup_heading"></h3>
    <p id="popup_text"></p>
</div>

<script>
    let popup = document.querySelector(".popup");
    let close = document.querySelector(".popup .close");

    popup.style.display = "block";
    popup.style.visibility = "hidden";
    setTimeout(() => {
        popup.style.visibility = "visible";
        popup.style.opacity = "1";
    }, 1000);

    close.addEventListener("click", () => {
        popup.style.opacity = "0";
        popup.style.visibility = "hidden";
        setTimeout(() => {
            popup.style.display = "none";
        }, 1000);
    });
</script>

<style>
    .popup {
        width: 400px;
        background-color: #f5f3f4;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 2px 2px 10px #dddddd;
        text-align: center;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        display: none;
        visibility: hidden;
        opacity: 0;
        transition: 1s;
    }

    .popup .close {
        position: absolute;
        right: 10px;
        top: 10px;
        border: none;
        outline: none;
        background-color: #ff7174;
        color: white;
        border-radius: 5px;
        padding: 3px 5px;
        cursor: pointer;
        transition: 0.5s;
    }

    .popup .close:hover {
        background-color: #ff0105;
    }

    .popup h3 {
        font-size: 1.5rem;
        margin-bottom: 15px;
    }
</style>
