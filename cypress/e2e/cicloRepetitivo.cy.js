describe('Prueba Ciclo Repetitivo', ()=>{
    it('Repite la prueba x veces',()=>{
        cy.visit('http://127.0.0.1:8000/')
        cy.contains('Iniciar Sesion').click()
        cy.url().should('include', '/login')
        cy.get('[name=email]').type('superadmin@gmail.com')
        cy.get('[name=password]').type('superadmin2022')
        cy.contains('Ingresar').click()
        cy.contains('Categorias Servicios').click()
        cy.contains('Agregar').click()
        for (let index = 0; index <2 ; index++) {
            cy.get('[name=nombre_categoria]').type(`Categoria 20${index}`);
            cy.get('[name=descripcion_categoria]').type(`Esta es la categoria numero 20${index}`);
            cy.contains('Guardar').click();
            cy.wait(1000);
            cy.contains('Agregar').click()

        }
    })
});