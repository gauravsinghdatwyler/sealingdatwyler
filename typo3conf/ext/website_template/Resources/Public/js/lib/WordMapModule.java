package ch.openinteractive.datwyler.components.features;

import info.magnolia.dam.asset.functions.DamTemplatingFunctions;
import info.magnolia.module.templatingkit.functions.STKTemplatingFunctions;
import info.magnolia.module.templatingkit.style.CssSelectorBuilder;
import info.magnolia.module.templatingkit.templates.components.ImageModel;
import info.magnolia.rendering.model.RenderingModel;
import info.magnolia.rendering.template.TemplateDefinition;
import info.magnolia.templating.functions.TemplatingFunctions;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.jcr.Node;

import ch.openinteractive.datwyler.DatwylerModule;
import ch.openinteractive.datwyler.beans.AbstractDataType;
import ch.openinteractive.datwyler.beans.Contact;
import ch.openinteractive.datwyler.util.OIQueryUtil;

public class WordMapModule <RD extends TemplateDefinition> extends ImageModel<TemplateDefinition> {

	public WordMapModule(Node content, TemplateDefinition definition,
			RenderingModel<?> parent, STKTemplatingFunctions stkFunctions,
			CssSelectorBuilder cssSelectorBuilder,
			TemplatingFunctions templatingFunctions,
			DamTemplatingFunctions damFunctions) {
		super(content, definition, parent, stkFunctions, cssSelectorBuilder,
				templatingFunctions, damFunctions);
	}

	public Map<String, List<Contact>> getAllContactsByContinent() {
		Map<String, List<Contact>> allContactsByContinent = new HashMap<String, List<Contact>>();
		List<Contact> allContacts = new ArrayList<Contact>();
		String query = OIQueryUtil.getBaseQuery();
		List<Node> queryResult = null;
		List<AbstractDataType> allCountries = getAllCountries();
		
		for (AbstractDataType country : allCountries) {
			String countryName = country.getName();
			List<Contact> emtyList = new ArrayList<Contact>();
			allContactsByContinent.put(countryName, emtyList);
			System.out.println("WorldMapModuel: adding country " + countryName);
		}

		query = query + " WHERE jcr:primaryType = ''mgnl:contact''";
		queryResult = OIQueryUtil.executeQuery(null, null, query, DatwylerModule.REPOSITORY_CONTACTS);

		if (queryResult != null) {
			for (Node node : queryResult) {
				Contact contact = new Contact(node, damFunctions);
				allContacts.add(contact);
				String continent = contact.getContinent();

				if (allContactsByContinent.containsKey(continent)) {
					System.out.println("WorldMapModuel: allContactsByContinent has wanted country");
					List<Contact> contactList = allContactsByContinent.get(continent);
					contactList.add(contact);
					allContactsByContinent.put(continent, contactList);
					System.out.println("WorldMapModuel: "+ contact.getOrganization() + "added to " + continent);
				}
			}
		}

		return allContactsByContinent;
	}

	public List<Contact> getAllContacts() {
		List<Contact> allContacts = new ArrayList<Contact>();
		List<Node> queryResult = null;
		String query = OIQueryUtil.getBaseQuery();
		query = query + " WHERE jcr:primaryType = ''mgnl:contact''";
		queryResult = OIQueryUtil.executeQuery(null, null, query, DatwylerModule.REPOSITORY_CONTACTS);
		
		for (Node node : queryResult) {
			Contact contact = new Contact(node, damFunctions);
			allContacts.add(contact);
		}

		return allContacts;
	}
	
	
	public List<AbstractDataType> getAllIndustries() {
		List<AbstractDataType> allIndustries= new ArrayList<AbstractDataType>();
		String query = OIQueryUtil.getBaseQuery();
		List<Node> queryResult = null;

		query = query + " WHERE jcr:primaryType = ''mgnl:industrie''";
		queryResult = OIQueryUtil.executeQuery(null, null, query, "datwyler");

		if (queryResult != null) {
			for (Node node : queryResult) {
				AbstractDataType industry = new AbstractDataType(node);
				allIndustries.add(industry);
			}
		}

		return allIndustries;
	}

	public List<AbstractDataType> getAllCountries() {
		List<AbstractDataType> allCountries= new ArrayList<AbstractDataType>();
		String query = OIQueryUtil.getBaseQuery();
		List<Node> queryResult = null;

		query = query + " WHERE jcr:primaryType = ''mgnl:country''";
		queryResult = OIQueryUtil.executeQuery(null, null, query, "datwyler");

		if (queryResult != null) {
			for (Node node : queryResult) {
				AbstractDataType country = new AbstractDataType(node);
				allCountries.add(country);
			}
		}

		return allCountries;
	}
}
