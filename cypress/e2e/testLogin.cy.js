describe('Test Login', () => {
  it('Visita la pagina principal y se loguea correctamente', () => {
    cy.visit('http://127.0.0.1:8000/')
    cy.contains('Iniciar Sesion').click()
    cy.url().should('include', '/login')
    cy.get('[name=email]').type('superadmin@gmail.com')
    cy.get('[name=password]').type('superadmin2022')
    cy.contains('Ingresar').click()
    cy.contains('Dashboard').should('exist')
  });
  it('Muestra un error con datos de inicio de sesión inválidos', () => {
    cy.visit('http://127.0.0.1:8000/login');
    cy.get('input[name=email]').type('usuario@example.com');
    cy.get('input[name=password]').type('passwordincorrecto');
    cy.contains('Ingresar').click();
    cy.contains('These credentials do not match our records.').should('exist');
  });
})