/**
 *
 * @param {String} id
 * @param {String} message
 * @returns {String} Node of element invalid feedback
 */
const invalidNode = (id, message) => {
    return `
    <div id="${id}Invalid" class="invalid-feedback">
        ${message}
    </div>
    `;
};
