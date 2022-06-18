
//borre lo que dice <script> por obvias razones
    const generateRandomString = (num) => {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result1 = ' ';
        const charactersLength = characters.length;
        for (let i = 0; i < num; i++) {
            result1 += characters.charAt(Math.floor(Math.random() * charactersLength));
        }

        return result1;
    }

    const displayRandomString = () => {
        let randomStringContainer = document.getElementById('random_string');
        randomStringContainer.innerHTML = generateRandomString(8);
    }


    var Codigo_de_control = encryptMessageRC4(generateRandomString(5), generateRandomString(9), false);
    document.getElementById('Codigo_control').value = Codigo_de_control;
    var nombres = document.getElementById('Nombres').value;
    var Apellido = document.getElementById('apellido').value;
    new QRious({
        element: document.querySelector("#codigo"),
        value: a, // La URL o el texto
        size: 200,
        backgroundAlpha: 0, // 0 para fondo transparente
        foreground: "#000000", // Color del QR
        level: "H", // Puede ser L,M,Q y H (L es el de menor nivel, H el mayor)
    });

