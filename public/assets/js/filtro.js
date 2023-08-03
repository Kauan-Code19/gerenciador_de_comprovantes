document.addEventListener("DOMContentLoaded", function () {
    const filtroItems = document.querySelectorAll(".filtro-item");
    const comprovantes = document.querySelectorAll(".filtered-card");

    filtroItems.forEach(function (item) {
        item.addEventListener("click", function () {
            const statusSelecionado = item.getAttribute("data-status");

            comprovantes.forEach(function (comprovante) {
                const statusComprovante = comprovante.getAttribute("data-status");

                if (statusSelecionado === "todos") {
                    comprovante.classList.add("col-md-3");
                    comprovante.style.display = "block";
                } else if (statusSelecionado === "vencido" && statusComprovante === "vencido") {
                    comprovante.classList.add("col-md-3");
                    comprovante.style.display = "block";
                } else if (statusSelecionado === "nao-vencido" && statusComprovante !== "vencido") {
                    comprovante.classList.add("col-md-3");
                    comprovante.style.display = "block";
                } else {
                    comprovante.classList.remove("col-md-3");
                    comprovante.style.display = "none";
                }
            });
        });
    });
});
