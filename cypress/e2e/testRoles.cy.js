describe('Test Login', () => {
    it('Testea los roles', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.contains('Iniciar Sesion').click()
        cy.url().should('include', '/login')
        cy.get('[name=email]').type('superadmin@gmail.com')
        cy.get('[name=password]').type('superadmin2022')
        cy.contains('Ingresar').click()
        cy.visit('http://127.0.0.1:8000/rol')
        cy.contains('Agregar').click()
        cy.get('[name=nombre_rol]').type('cypress')
        cy.get('[name=descripcion_rol]').type('holaTesting')
        cy.contains('Guardar').click()
      });
  })